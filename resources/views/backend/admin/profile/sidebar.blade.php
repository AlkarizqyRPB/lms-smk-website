 <div class="col-lg-4">
     <div class="card">
         <div class="card-body">
             <div class="d-flex flex-column align-items-center text-center">
                 <img id="photoPreview"
                     src="{{ auth()->user()->photo ? asset(auth()->user()->photo) : asset('backend/assets/images/avatars/avatar-2.png') }}"
                     alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                 <div class="mt-3">
                     <h4>{{ auth()->user()->username }}</h4>
                     <p class="text-secondary mb-1">{{ auth()->user()->email }}</p>
                     <p class="text-muted font-size-sm">{{ auth()->user()->phone }}</p>
                     <button class="btn btn-primary">Follow</button>
                     <button class="btn btn-outline-primary">Message</button>
                 </div>
             </div>
             <hr class="my-4" />

         </div>
     </div>
 </div>
