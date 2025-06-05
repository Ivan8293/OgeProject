import sys
import json
import pytesseract
from PIL import Image
import openai

def main(image_path):
    # 1. Распознаём текст с изображения
    img = Image.open(image_path)
    recognized_text = pytesseract.image_to_string(img, lang='rus+eng')  # можно добавить языки по необходимости

    # 2. Подготавливаем запрос для ChatGPT
    openai.api_key = 'ВАШ_OPENAI_API_КЛЮЧ'  # поставьте свой ключ OpenAI

    prompt = f"""
    Ты — эксперт по проверке решений по математике ОГЭ. Ниже дан текст решения ученика (распознанный с изображения):
    
    {recognized_text}
    
    Проанализируй его и дай оценку по шкале от 0 до 4 баллов (4 — отлично, 0 — полностью неверно).  
    Также дай короткий комментарий с указанием ошибок или похвалой.
    
    Верни ответ в формате JSON с полями "score" и "comment".
    """

    try:
        response = openai.ChatCompletion.create(
            model="gpt-4o-mini",  # можно заменить на gpt-4, gpt-3.5-turbo и т.п.
            messages=[{"role": "user", "content": prompt}],
            temperature=0.0,
            max_tokens=150,
        )

        answer = response.choices[0].message['content'].strip()

        # Пытаемся распарсить JSON из ответа
        result = json.loads(answer)
    except Exception as e:
        # Если ошибка — возвращаем дефолтный ответ
        result = {
            "score": 0,
            "comment": "Не удалось оценить решение: " + str(e)
        }

    print(json.dumps(result, ensure_ascii=False))


if __name__ == "__main__":
    if len(sys.argv) < 2:
        print(json.dumps({"score": 0, "comment": "Ошибка: не передан путь к изображению"}, ensure_ascii=False))
        sys.exit(1)

    image_path = sys.argv[1]
    main(image_path)
