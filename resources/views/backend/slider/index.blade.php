@extends('backend.layout.app')
@section('title', 'Slider Listele')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Slider Listesi [{{ $All->count() }}]
                    </h4>
                </div>
                <div class="d-flex justify-content-between">
                    <a class="btn btn-primary btn-sm me-1" href="{{  url()->previous() }}" title="Geri">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 18v-6a3 3 0 0 0 -3 -3h-10l4 -4m0 8l-4 -4" /></svg>
                        Geri
                    </a>
                    <a class="btn btn-primary btn-sm me-1" href="{{ route('slider.create') }}" title="Slider Ekle">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Slider Ekle
                    </a>
                </div>
            </div>

            <div class="table-responsive p-2">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Resim</th>
                            <th>Başlık</th>
                            <th>Durum</th>
                            <th class="w-1">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody id="orders">
                        @foreach($All as $item)
                            <tr id="slider_{{ $item->id }}">
                                <td>
                                    <img src="{{ $item->getFirstMediaUrl('page', 'thumb') }}" class="avatar me-2"/>
                                </td>
                                <td>
                                    <a href="{{ route('slider.edit', $item->id) }}">
                                        {{ $item->title }}
                                    </a>
                                </td>
                                <td>
                                    <label class="form-check form-check-single form-switch">
                                        <input class="form-check-input switch" status-id="{{ $item->id }}"
                                               type="checkbox" @if ($item->status == 1) checked @endif>
                                    </label>
                                </td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle align-text-top btn-sm" data-bs-toggle="dropdown">
                                                İşlemler
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item"
                                                   href="{{ route('slider.edit', $item->id) }}">
                                                    Düzenle
                                                </a>
                                                <form action="{{ route('slider.destroy', $item->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item">
                                                        Sil
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('customJS')
    <script>
        $(document).ready(function() {
            $('#orders').sortable({
                update: function() {
                    let siralama = $('#orders').sortable('serialize');
                    $.get("{{ route('slider.getOrder') }}?" + siralama, () => {
                        $("#rank").show(500).delay(2500).fadeOut();
                        document.getElementById("rank").innerHTML = "Sıralama başarıyla güncellendi.";
                    });
                }
            });

            $('.switch').change(function() {
                const id = $(this)[0].getAttribute('status-id');
                const status = $(this).prop('checked');

                $.get("{{ route('slider.getSwitch') }}", {id: id, status: status},
                    () => {
                        if (status) {}
                    });
            })
        });
    </script>
@endsection 