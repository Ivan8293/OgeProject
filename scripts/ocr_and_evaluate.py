import sys
import json
import pytesseract
from PIL import Image
import base64
import openai
import httpx
from openai import OpenAI

sys.stdout.reconfigure(encoding='utf-8')

# Прокси (если используется)
PROXY_URL = "http://xUm2ok:bNQ0YT@196.18.164.93:8000"
transport = httpx.HTTPTransport(proxy=PROXY_URL)

# OpenAI клиент
client = OpenAI(
    api_key="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",  # вставь свой ключ
    http_client=httpx.Client(transport=transport, timeout=60.0)
)

# Указать путь к tesseract
pytesseract.pytesseract.tesseract_cmd = r"C:\OSPanel\domains\OgeProject\scripts\Tesseract\tesseract.exe"

def ocr_image(image_path):
    try:
        image = Image.open(image_path)
        text = pytesseract.image_to_string(image, lang='rus')
        return text.strip()
    except Exception as e:
        return f"Ошибка OCR: {str(e)}"

def encode_image_base64(image_path):
    with open(image_path, "rb") as f:
        encoded = base64.b64encode(f.read()).decode("utf-8")
    return f"data:image/png;base64,{encoded}"

def call_openai_with_image(task_text, solution_image_b64):
    try:
        response = client.chat.completions.create(
            model="gpt-4o",
            messages=[
                {
                    "role": "system",
                    "content": "Ты строго отвечаешь в формате JSON, проверяешь решения ОГЭ по математике."
                },
                {
                    "role": "user",
                    "content": [
                        { "type": "text", "text":
                            (
                                "Проанализируй изображение с решением ученика и сравни его с заданием. Если решение не соотвествует заданию, скажи об этом и поставь 0. Слово ученик заменяй на вы\n\n"
                                "Критерии оценки:\n"
                                "2 — решение полное, верное;\n"
                                "1 — есть вычислительная ошибка или неточность;\n"
                                "0 — решение неправильное или отсутствует.\n\n"
                                "Задание:\n" + task_text + "\n\n"
                                "Оцени и верни только JSON в формате:\n"
                                "{ \"score\": 0/1/2, \"comment\": \"...\" }"
                            )
                        },
                        {
                            "type": "image_url",
                            "image_url": {
                                "url": solution_image_b64
                            }
                        }
                    ]
                }
            ],
            max_tokens=300,
            temperature=0.2
        )

        reply = response.choices[0].message.content.strip()

        # Попытка распарсить
        try:
            return json.loads(reply)
        except json.JSONDecodeError:
            cleaned = reply.strip().removeprefix("```json").removesuffix("```").strip()
            return json.loads(cleaned)

    except Exception as e:
        return {
            "score": None,
            "comment": f"Ошибка при обращении к OpenAI: {str(e)}"
        }

def main():
    if len(sys.argv) != 3:
        print("Usage: python script.py solution_image.png task_image.png")
        sys.exit(1)

    solution_image_path = sys.argv[1]
    task_image_path = sys.argv[2]

    task_text = ocr_image(task_image_path)
    solution_image_b64 = encode_image_base64(solution_image_path)

    if not task_text.strip():
        result = {
            "score": None,
            "comment": "Не удалось распознать текст задания"
        }
    else:
        result = call_openai_with_image(task_text, solution_image_b64)

    print(json.dumps(result, ensure_ascii=False))

if __name__ == "__main__":
    main()
