
        
        <div class="col-md-6">
            <label for="tarea">Tarea</label>
            <input class="form-control @error('tarea') is-invalid @enderror" placeholder="Tarea" name="tarea" type="text" value="{{ old('tarea',@$tarea->tarea) }}" id="tarea">
            @error('tarea')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    <div class="col-md-6">
        <label for="contact_id">Contact</label>
        
        <select class="form-select @error('contact_id') is-invalid @enderror" name="contact_id" id="contact_id">
            <option value="">Select Contact</option>
            @foreach($contacts as $relatedItem)
                <option value="{{ $relatedItem->id }}" {{ old('contact_id', @$tarea->contact_id) == $relatedItem->id ? 'selected' : '' }}>
                    {{ $relatedItem->name }}
                </option>
            @endforeach
        </select>
        @error('contact_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="tipotarea_id">Tipotarea</label>
        
        <select class="form-select @error('tipotarea_id') is-invalid @enderror" name="tipotarea_id" id="tipotarea_id">
            <option value="">Select Tipotarea</option>
            @foreach($tipotareas as $relatedItem)
                <option value="{{ $relatedItem->id }}" {{ old('tipotarea_id', @$tarea->tipotarea_id) == $relatedItem->id ? 'selected' : '' }}>
                    {{ $relatedItem->name }}
                </option>
            @endforeach
        </select>
        @error('tipotarea_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
