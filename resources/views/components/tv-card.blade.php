   
                    <div class="mt-8">
                        <a href="{{route('tv.show',$tvShow['id'])}}" >
                            <img src={{$tvShow['poster_path']}} class="hover:opacity-75 transition ease-in-out duration-150" >
                        </a>
                        <div class="mt-2">
                            <a href="{{route('tv.show',$tvShow['id'])}}" class="text-gray-400 text-lg mt-2">{{$tvShow['original_name']}}</a>
                            <div class="flex items-center text-gray-500 text-sm mt-1">
                                 <span><svg class="w-4" viewBox="0 0 24 24" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                                    <g transform="translate(0 -1028.4)">
                                     <path d="m12 1028.4 4 9 8 1-6 5 2 9-8-5-8 5 2-9-6-5 8-1z" fill="#f39c12"/>
                                     <path d="m12 1028.4-4 9-6.9688 0.8 4.9688 4.2-0.1875 0.8 0.1875 0.2-1.75 7.8 7.75-4.8 7.75 4.8-1.75-7.8 0.188-0.2-0.188-0.8 4.969-4.2-6.969-0.8-4-9z" fill="#f1c40f"/>
                                    </g>
                                   </svg></span>
                                 <span class="ml-1">{{ $tvShow['vote_average'] }}</span>
                                 <span class="mx-2">|</span>
                                 <span class="mx-2">{{$tvShow['first_air_date']}}</span>
                            </div>
                            
                            <div class="text-gray-400 text-sm">
                                {{$tvShow['genres']}}
                            </div>
                           
                            
                         </div>
                    </div>