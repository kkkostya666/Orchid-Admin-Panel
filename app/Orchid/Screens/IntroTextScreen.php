<?php

namespace App\Orchid\Screens;

use App\Models\IntroText;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class IntroTextScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'introTexts' => IntroText::first()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Cмена текста на главном слайде';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Сохранить')->method('save'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Input::make('introTexts.title_1')
                    ->title('Заголовок 1')->required(),
                Input::make('introTexts.title_2')
                    ->title('Заголовок 2')->required(),
            ]),
        ];
    }

    public function save()
    {
        IntroText::updateOrCreate(['id' => 1], request()->get('introTexts'));

        Alert::success('Текст успешно сохранен.');
    }
}
