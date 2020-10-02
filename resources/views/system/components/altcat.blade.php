<?php
$category = \App\Models\Category::all();
?>

@foreach($category as $cat)
    <option value="{{$cat['id']}}"
    <?php
        if(isset($cc)){
            if($cc['main'] == $cat['id']){
                echo "selected";
            }
        }
        ?>>{{$cat['cat_name']}}</option>
@endforeach
