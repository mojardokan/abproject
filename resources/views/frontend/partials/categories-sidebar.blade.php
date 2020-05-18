<div class="nav-link link-nav">
  <ul>
    <li> <a href="#"><h3>Categories</h3></a>
      <ul class="dropdown">

         @foreach (App\Models\Category::orderby('name','asc')->where('parent_id',NULL)->get() as $parent)
         <li id="#Category{{$parent->id}}" value="{{$parent->id}}">
            <a href="{!!route('categories.showcategory', $parent->id)!!}">{{$parent->name}}</a>
            <ul>
           @foreach (App\Models\Category::orderby('name','asc')->where('parent_id',$parent->id)->get() as $child)

           <li id="#Category{{$child->id}}" value="{{$child->id}}"><a href="{!!route('categories.showcategory', $child->id)!!}">{{$child->name}}</a></li>

           @endforeach
           </ul>
         @endforeach
         </li>
       </ul>
    </li>
  </ul>
</div>
