
        
        <div class="col-md-6">
            <label for="nombre">Nombre</label>
            <input class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre" name="nombre" type="text" value="{{ old('nombre',@$tipotarea->nombre) }}" id="nombre">
            @error('nombre')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
