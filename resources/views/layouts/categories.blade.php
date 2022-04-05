<div class="card">
    <div class="card-header">Categories</div>
    <div class="card-body">
    @if (count($allcategories) > 0)
      <ul style="list-style-type:none">
           @foreach($allcategories as $category)
               <li>
                   <a href="{{route('category', $category->id)}}">{{$category->name}}</a>
               </li>
           @endforeach
       </ul>
    @endif
    </div>
    </div>
    </div>
