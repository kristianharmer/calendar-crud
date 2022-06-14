@php($colour = "")
@php($hasMessage = false)

@if ($message = Session::get('success'))
    @php($colour = "green")
    @php($hasMessage = true)
@elseif($message = Session::get('error'))
    @php($colour = "red")
    @php($hasMessage = true)
@elseif($message = Session::get('warning'))
    @php($colour = "orange")
    @php($hasMessage = true)
@elseif($message = Session::get('info'))
    @php($colour = "blue")
    @php($hasMessage = true)
@endif

@if($hasMessage)
<div class="bg-{{ $colour }}-100 border border-{{ $colour }}-400 text-{{ $colour }}-700 px-4 py-3 rounded relative">
    <strong>{{ $message }}</strong>
</div>
@endif
