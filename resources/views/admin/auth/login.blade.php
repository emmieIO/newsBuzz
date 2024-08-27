<x-auth>
    <x-slot:title>NewsBuzz:: Admin Login</x-slot>
    <div class="login-card login-dark">
        <div>
            <div class="login-main" >
                <form class="bg-white b-r-20 p-4" method="POST" action="{{route('login')}}">
                    @csrf
                    @method('POST')
                    <a class="h3" href="{{route('home')}}"><i class="ti ti-news"></i> &nbsp; NewBuzz</a>
                    <h4>Sign in to Account </h4>
                    <p>Please fll in Credentials</p>
                    <div class="form-group">
                        <label class="col-form-label">Email Address</label>
                        <input class="form-control @error('email') is-invalid @enderror" name="email" type="email"
                            placeholder="admin@expmple.com">
                            @error('email')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label">Password</label>
                        <div class="form-input position-relative">
                            <input class="form-control" type="password" name="password"
                                placeholder="*********">
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-auth>