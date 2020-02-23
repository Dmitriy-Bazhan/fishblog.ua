@if(count($errors) > 0)
    <div>
        @foreach ($errors->all() as $value)
                <p class="errors_letters"> {{  $value }}  </p>
        @endforeach
    </div>
@endif
