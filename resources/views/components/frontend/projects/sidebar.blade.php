@foreach ( $pages as $page)
   <a class="ref_styles active_ref dropdown_arrow 
   @if(Request::is('en/Projects/'.$page->slug.'/*'))
   active
  @endif
   " href="#">
                 <div class="img_link">
                     <img class="Identity_icon" src="content/images/small_icon/card.png" alt />{{  $page->name }}
                 </div>
                 <i class="bi bi-chevron-down"></i>
             </a>

             <ul class="aside_menu">
             @foreach ($projects as $project )
                 @if($page->id == $project->Page->id)
                 <li>
                 <a href="{{route('projects',[$page->slug,$project->id])}}"
                  @if(Request::is('en/Projects/'.$page->slug.'/'.$project->id))
                 class="li_active" @else style="color:black"
                 @endif  
                 >
                 {{$project->title }}
                 </a>
               </li>
                 @endif
             @endforeach
             </ul>

@endforeach
