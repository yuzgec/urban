@extends('backend.layout.app')
@section('title', 'Çeviriler')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Çeviriler [{{ $lines->count() }}]
                    </h4>
                </div>
                <div>
                    <a class="btn btn-primary btn-sm" href="{{ route('language-lines.create') }}">Yeni Ekle</a>
                </div>
            </div>

            <div class="table-responsive p-2">
                <table class="table table-hover table-striped table-bordered table-center">
                    <thead>
                        <tr>
                            <th>Grup</th>
                            <th>Anahtar</th>
                            <th>Türkçe</th>
                            <th>İngilizce</th>
                            <th class="w-1">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($lines as $line)
                        <tr>
                            <td>{{ $line->group }}</td>
                            <td>{{ $line->key }}</td>
                            <td>{{ $line->text['tr'] }}</td>
                            <td>{{ $line->text['en'] }}</td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <a class="btn btn-primary btn-sm" href="{{ route('language-lines.edit', $line) }}">
                                        Düzenle
                                    </a>
                                    <form action="{{ route('language-lines.destroy', $line) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Emin misiniz?')">
                                            Sil
                                        </button>
                                    </form>
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