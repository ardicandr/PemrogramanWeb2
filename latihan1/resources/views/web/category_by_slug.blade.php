<x-layout> 
<<<<<<< HEAD
   @if ($category)
       <h1>{{ $category->name }}</h1> 
       <hr> 
       <p>{{ $category->description }}</p>
   @else
       <h1>Kategori tidak ditemukan</h1>
       <p>Silakan kembali ke halaman sebelumnya.</p>
   @endif
</x-layout> 
=======
   <h1>{{ $category['name'] }}</h1> 
   <hr> 
   <p> 
       {{ $category['description'] }} 
   </p>    
</x-layout> 
>>>>>>> b381945a0a43808f183fee8f9459713e675018b5
