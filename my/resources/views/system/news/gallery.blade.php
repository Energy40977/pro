@if(isset($gallery))
    @foreach($gallery as $gal)

        <tr>
            <td>
                <div class="img-container">
                    <img src="{{$gal['image']}}" alt="image">
                </div>
            </td>
            <td class="td-actions" id="{{$gal['id']}}">
                <button type="button" rel="tooltip" data-placement="left"  title="" class="btn btn-link" data-original-title="Sil">
                    <i class="material-icons" onclick="Deletegal(this.id);"  id="{{$gal['id']}}">close</i>
                </button>
            </td>
        </tr>
    @endforeach
@else
    @if(isset($allimages))
        @foreach($allimages as $gal)
            <tr>
                <td>
                    <div class="img-container">
                        <img src="{{$gal['image']}}" alt="image">
                    </div>
                </td>


                <td class="td-actions" id="{{$gal['id']}}">
                    <button type="button" rel="tooltip" data-placement="left"  title="" class="btn btn-link" data-original-title="Sil">
                        <i class="material-icons" onclick="Deletegal(this.id);"  id="{{$gal['id']}}">close</i>
                    </button>
                </td>
            </tr>
        @endforeach
        @endif
@endif
