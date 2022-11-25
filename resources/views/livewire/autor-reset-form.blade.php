<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
        @if(Session::get('fail'))
            <div class="alert alert-danger">
                {!! Session::get('fail') !!}
            </div>
        @endif

        @if(Session::get('success'))
            <div class="alert alert-success">
                {!! Session::get('success') !!}
            </div>
        @endif

    <form class="card card-md" method="post" wire:submit.prevent="ResetHandler()" autocomplete="off">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Resetar Passwordt</h2>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="text" class="form-control" placeholder="Inserir Email" wire:model="email" >
              @error('email')
                <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="mb-2">
              <label class="form-label">
                Nova Password              
              </label>
              <div class="input-group input-group-flat">
                    <input type="password" class="form-control" name="new_password" placeholder="Nova Password" wire:model="new_password" autocomplete="off">
                    <span class="input-group-text">
                    <a href="#" class="link-secondary" title="" data-bs-toggle="tooltip" data-bs-original-title="Show password"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="2"></circle><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path></svg>
                    </a>
                    </span>
                    
              </div>
                @error('new_password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-2">
              <label class="form-label">
                Confirmar Password
               
              </label>
              <div class="input-group input-group-flat">
                    <input type="password" class="form-control" placeholder="Confirmar Password" wire:model="conf_password" autocomplete="off">
                    <span class="input-group-text">
                    <a href="#" class="link-secondary" title="" data-bs-toggle="tooltip" data-bs-original-title="Show password"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="2"></circle><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path></svg>
                    </a>
                    </span>
                    
              </div>
                @error('conf_password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-check">
                    <a href="{{ route('autor.login') }}">Voltar para pagina de Login</a>
                </label>
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Resetar</button>
            </div>
          </div>

        </form>
</div>
