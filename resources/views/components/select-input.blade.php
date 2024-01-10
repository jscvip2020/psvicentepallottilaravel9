<select {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
    @foreach($options as $key=>$valor)
    <option value="{{$key}}" @if($key===$value) selected @endif>{{$valor}}</option>
    @endforeach

</select>
