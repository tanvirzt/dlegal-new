<div class="form-group">
    <label for="district_id"> District </label>
    <select name="district_id" class="form-control select2"
            id="district_id">

            <option>Select</option>
            @foreach($division as $item)
                <option value="{{ $item->id }}" {{(old('division') == $item->id?'selected':'')}}>{{ $item->division_name }}</option>
            @endforeach

        <!-- <option>Select</option>
        @if (!empty($district))
            @foreach ($district as $districts)
                <option value="{{$districts->id}}" @if(isset($districts->districts_id) && $districts->districts_id ==
                $districts->id) selected="" @endif>{{$districts->district_name}} </option>
            @endforeach
        @endif -->
    </select>
</div>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
    $('.select2').select2()
</script>



