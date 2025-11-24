@include('layouts.admin.header')

<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="#">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Data User</h1>
            <p class="mb-0">List data seluruh User</p>
        </div>
        <div>
            <a href="{{ route('user.create') }}" class="btn btn-success text-white">
                <i class="far fa-plus-square me-1"></i> Tambah User
            </a>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="fw-normal small">
        Menampilkan {{ $dataUser->firstItem() }} hingga {{ $dataUser->lastItem() }} dari total {{ $dataUser->total() }} data
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow mb-4">
            <div class="card-body">

                <form method="GET" action="{{ route('user.index') }}" class="mb-3">
    <div class="d-flex justify-content-end align-items-center gap-2">

        <select name="gender" class="form-select" style="width: 140px;">
            <option value="">All Genders</option>
            <option value="Male" {{ request('gender')=='Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ request('gender')=='Female' ? 'selected' : '' }}>Female</option>
        </select>

        <div class="input-group" style="width: 250px;">
            <input type="text" name="search" class="form-control"
                value="{{ request('search') }}" placeholder="Search">
            <button type="submit" class="input-group-text">
                <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <button class="btn btn-primary">Filter</button>
    </div>
</form>


                {{-- TABLE --}}
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Profile Picture</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th width="160px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataUser as $item)
                            <tr>
                                <td>
                                    @if($item->profile_picture)
                                        <img src="{{ asset('storage/' . $item->profile_picture) }}"
                                             width="40" height="40"
                                             style="object-fit: cover; border-radius: 50%;">
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($item->name) }}"
                                             width="40" height="40"
                                             style="object-fit: cover; border-radius: 50%;">
                                    @endif
                                </td>

                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>

                                <td class="text-center">
                                    <a href="{{ route('user.edit', $item->id) }}"
                                       class="btn btn-info btn-sm">Edit</a>

                                    <form action="{{ route('user.destroy', $item->id) }}"
                                          method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus user ini?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $dataUser->links('pagination::bootstrap-5') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@include('layouts.admin.footer')
</main>
@include('layouts.admin.js')
</body>
</html>
