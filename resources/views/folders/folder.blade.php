<p>Caminho</p>
<div>
    @foreach ($caminho as $structure)
        <a href="{{route('folder.view',$structure->uuid)}}"> {{$structure->name}} </a> /
    @endforeach
</div>

<ul>
    <form action="{{route('folder.create',$folder->uuid)}}" method="post">@csrf
        <input type="text" name='name'>
        <button>Nova Pasta</button>
    </form>
    @foreach ($folder->childs as $item)
        <li>
            <a href="{{route('folder.view',$item->uuid)}}" id="nameFolder{{$item->id}}"><b>{{$item->name}}</b></a>
            <form action="{{route('structure.update',$item->id)}}" id="renameFolder{{$item->id}}" style="display:none" method="post">@csrf @method('PUT')
                <input type="text" name="name" id="" value="{{$item->name}}">
                <button>Ok</button>
            </form>
            <form action="{{route('folder.delete',$item->id)}}" method="post">@csrf @method('delete')
                <button>Apagar</button>
            </form>
            <button onclick="renameFolder({{$item->id}})">Renomear</button>


        </li>
    @endforeach
</ul>


<script>
    function renameFolder(id){
        document.getElementById('renameFolder'+id).style.display='inherit';
        document.getElementById('nameFolder'+id).style.display='none';

    }
</script>
