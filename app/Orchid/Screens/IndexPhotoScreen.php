<?php

namespace App\Orchid\Screens;

use App\Models\IndexPhoto;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class IndexPhotoScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'indexPhoto' => IndexPhoto::first() ?? new IndexPhoto(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Изображения на главной странице';
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
                Input::make('indexPhoto.title')
                    ->title('Название картинки')
                    ->required(),

                Upload::make('indexPhoto.image')
                    ->title('Загрузить изображение')
                    ->acceptedFiles('image/*'),
            ]),
        ];
    }

    public function save(): void
    {
        $data = request()->get('indexPhoto');

        IndexPhoto::updateOrCreate(
            ['id' => 1],
            [
                'title' => $data['title'] ?? '',
                'image' => $data['image'][0],
            ]
        );

        Alert::success('Изображение успешно сохранено.');
    }
}
