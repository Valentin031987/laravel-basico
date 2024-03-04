
        
        <div class="col-md-6">
            <label for="nombre">Nombre</label>
            <input class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre" name="nombre" type="text" value="{{ old('nombre',@$listacorreo->nombre) }}" id="nombre">
            @error('nombre')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="correo">Correo</label>
            <input class="form-control @error('correo') is-invalid @enderror" placeholder="Correo" name="correo" type="text" value="{{ old('correo',@$listacorreo->correo) }}" id="correo">
            @error('correo')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    <div class="col-md-6">
        <label for="contact_id">Contact</label>
        
        <select class="form-select @error('contact_id') is-invalid @enderror" name="contact_id" id="contact_id">
            <option value="">Select Contact</option>
            @foreach($contacts as $relatedItem)
                <option value="{{ $relatedItem->id }}" {{ old('contact_id', @$listacorreo->contact_id) == $relatedItem->id ? 'selected' : '' }}>
                    {{ $relatedItem->name }}
                </option>
            @endforeach
        </select>
        @error('contact_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
