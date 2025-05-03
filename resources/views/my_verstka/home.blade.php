@extends("my_verstka.home_parent")


@section("link")
    @yield("child_link")
@endsection


@section("home_main")
    @yield("main_content")
@endsection



@section("teacher_student_nav")
<div class="separate_line"></div>
    @if (Auth::guard('student')->check())
    
        <a class="link_wrapper" href="{{ route('trajectory', ['page' => 'trajectory']) }}">
            @isset($page)
                @if($page == 'trajectory')
                    <div class="button_container active_button bor">
                @else
                    <div class="button_container bor">
                @endif
            @else
                    <div class="button_container bor">
            @endisset
                        <div class="button_icon_container bor">
                        <i class="fa fa-sitemap" aria-hidden="true"></i>

                        </div>
                        <div class="button_text_container bor">
                            Траектория
                        </div>
            </div>
        </a>

        <a class="link_wrapper" href="{{ route('statistics', ['page' => 'statistics']) }}">

            @isset($page)
                @if($page == 'statistics')
                    <div class="button_container active_button bor">
                @else
                    <div class="button_container bor">
                @endif
            @else
                    <div class="button_container bor">
            @endisset
                        <div class="button_icon_container bor">
                        <i class="fa fa-line-chart" aria-hidden="true"></i>
                        </div>
                        <div class="button_text_container bor">
                            Статистика
                        </div>
            </div>
        </a>

    @elseif (Auth::guard('teacher')->check())
        <a class="link_wrapper" href="{{ route('teacher', ['page' => 'classes']) }}">
            @isset($page)
                @if($page == 'classes')
                    <div class="button_container active_button bor">
                @else
                    <div class="button_container bor">
                @endif
            @else
                <div class="button_container bor">
            @endisset
                        <div class="button_icon_container bor">
                        <i class="fa fa-users" aria-hidden="true"></i>

                        </div>
                        <div class="button_text_container bor">
                            Классы
                        </div>
            </div>
        </a>

        <a class="link_wrapper" href="{{ route('homeworks', ['page' => 'homeworks']) }}">
            @isset($page)
                @if($page == 'homeworks')
                    <div class="button_container active_button bor">
                @else
                    <div class="button_container bor">
                @endif
            @else
                <div class="button_container bor">
            @endisset
                        <div class="button_icon_container bor">
                        <i class="fa fa-leanpub" aria-hidden="true"></i>
                        </div>
                        <div class="button_text_container bor">
                            Домашние задания
                        </div>
            </div>
        </a>
    
    @elseif (!Auth::guard('teacher')->check() && !Auth::guard('student')->check())
        <a class="link_wrapper" href="{{ route('trajectory', ['page' => 'trajectory']) }}">
            @isset($page)
                @if($page == 'trajectory')
                    <div class="button_container active_button bor">
                @else
                    <div class="button_container bor">
                @endif
            @else
                    <div class="button_container bor">
            @endisset
                        <div class="button_icon_container bor">
                        <i class="fa fa-sitemap" aria-hidden="true"></i>
                        </div>
                        <div class="button_text_container bor">
                            Траекторияяя
                        </div>
            </div>
        </a>

        <a class="link_wrapper" href="{{ route('statistics', ['page' => 'statistics']) }}">
            @isset($page)
                @if($page == 'statistics')
                    <div class="button_container active_button bor">
                @else
                    <div class="button_container bor">
                @endif
            @else
                    <div class="button_container bor">
            @endisset
                        <div class="button_icon_container bor">
                        <i class="fa fa-line-chart" aria-hidden="true"></i>
                        </div>
                        <div class="button_text_container bor">
                            Статистикааа
                        </div>
            </div>
        </a>
    @endif
@endsection




@section("common_nav")   

    <div class="separate_line"></div>

    <a class="link_wrapper" href="{{ route('topics', ['page' => 'topics']) }}">
        @isset($page)
            @if($page == 'topics')
                <div class="button_container active_button bor">
            @else
                <div class="button_container bor">
            @endif
        @else
            <div class="button_container bor">
        @endisset
                    <div class="button_icon_container bor">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    </div>
                    <div class="button_text_container bor">
                        Учебные темы
                    </div>
        </div>
    </a>

    <a class="link_wrapper" href="{{ route('tasks_bank', ['page' => 'tasks_bank']) }}">
        @isset($page)
            @if($page == 'tasks_bank')
                <div class="button_container active_button bor">
            @else
                <div class="button_container bor">
            @endif
        @else
            <div class="button_container bor">
        @endisset
                    <div class="button_icon_container bor">
                    <i class="fa fa-check-square" aria-hidden="true"></i>


                    </div>
                    <div class="button_text_container bor">
                        Бенк заданий
                    </div>
        </div>
    </a>

    <a class="link_wrapper" href="{{ route('KIMs', ['page' => 'KIMs']) }}">
        @isset($page)
            @if($page == 'KIMs')
                <div class="button_container active_button bor">
            @else
                <div class="button_container bor">
            @endif
        @else
            <div class="button_container bor">
        @endisset
                    <div class="button_icon_container bor">
                    <i class="fa fa-trophy" aria-hidden="true"></i>

                    </div>
                    <div class="button_text_container bor">
                        КИМы
                    </div>
        </div>
    </a>

@endsection