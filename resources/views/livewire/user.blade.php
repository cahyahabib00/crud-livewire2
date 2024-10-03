<div>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <form wire:submit.prevent="store">
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" wire:model="name" class="form-control" id="name">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" wire:model="email" class="form-control" id="email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" wire:model="password" class="form-control" id="password">
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>


    <div class="my-5">
       
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead> 
            <tbody>
                    @foreach($datatampilan as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->password}}</td>
                        <td>
                          
                            <button type="button" class="btn btn-warning my-4" wire:click="edit({{ $item->id }})">Edit</button>
                            <button type="button" class="btn btn-danger my-4" wire:click="destroy({{ $item->id }})">Hapus</button>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            
        </table>
    </div>
</div>
