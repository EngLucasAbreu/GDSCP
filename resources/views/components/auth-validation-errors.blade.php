@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <ul class="mt-1 list-unstyled">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
