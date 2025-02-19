@extends('backend.layout.app')
@section('title', 'Çeviri Düzenle')
@section('content')
    <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Çeviri Düzenle
                    </h4>
                </div>
                <div>
                    <a class="btn btn-primary btn-sm" href="{{ route('language-lines.index') }}">Çeviriler</a>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('language-lines.update', $languageLine) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label class="form-label">Grup</label>
                        <input type="text" class="form-control @error('group') is-invalid @enderror" name="group" value="{{ old('group', $languageLine->group) }}" required>
                        @error('group')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Anahtar</label>
                        <input type="text" class="form-control @error('key') is-invalid @enderror" name="key" value="{{ old('key', $languageLine->key) }}" required>
                        @error('key')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Türkçe</label>
                        <input type="text" class="form-control @error('text.tr') is-invalid @enderror" name="text[tr]" value="{{ old('text.tr', $languageLine->text['tr']) }}" required>
                        @error('text.tr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">İngilizce</label>
                        <input type="text" class="form-control @error('text.en') is-invalid @enderror" name="text[en]" value="{{ old('text.en', $languageLine->text['en']) }}" required>
                        @error('text.en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Arapça</label>
                        <input type="text" class="form-control @error('text.sa') is-invalid @enderror" name="text[sa]" value="{{ old('text.sa', $languageLine->text['sa']) }}" required>
                        @error('text.sa')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Güncelle</button>
                </form>
            </div>
        </div>
    </div>
@endsection 