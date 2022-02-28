<div>
    <div class="content-page">
      <div class="content">
  
          <!-- Start Content-->
          <div class="container-fluid">
  
              <div class="row">
                  <div class="col-sm-8">
                      @if (Session::has('password_success'))
                          <div class="alert alert-success" role="alert">{{ Session::get('password_success') }}</div>
                      @endif
                      @if (Session::has('password_error'))
                            <div class="alert alert-success" role="alert">{{ Session::get('password_error') }}</div>
                      @endif
                      <form wire:submit.prevent="changePassword">
                        <div class="card">
                            <div class="bg-picture card-body">
                                <div class="d-flex align-items-top">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h4 class="m-0 mb-3">Change Password</h4>
                                        <div class="mb-3">
                                            <label for="current_password" class="form-label">Current Password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="current_password" class="form-control" placeholder="Current Password" wire:model="current_password">
                                                <div class="input-group-text" data-password="false">
                                                    <span class="password-eye"></span>
                                                </div>
                                            </div>
                                            @error('current_password')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">New Password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="password" class="form-control" placeholder="New Password" wire:model="password">
                                                <div class="input-group-text" data-password="false">
                                                    <span class="password-eye"></span>
                                                </div>
                                            </div>
                                            @error('password')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="password_confirmation" class="form-control" placeholder="Confirm Password" wire:model="password_confirmation">
                                                <div class="input-group-text" data-password="false">
                                                    <span class="password-eye"></span>
                                                </div>
                                            </div>
                                            @error('password_confirmation')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                      <!--/ meta -->
                  </div>
  
                  <div class="col-sm-4">
                      <div class="card">
                      <div class="card-body">
                          <div class="dropdown float-end">
                              <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="mdi mdi-dots-vertical"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-end">
                                  <!-- item-->
                                  <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                  <!-- item-->
                                  <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                  <!-- item-->
                                  <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                  <!-- item-->
                                  <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                              </div>
                          </div>
  
                          <h4 class="header-title mt-0 mb-3">Two Factor Authenticatable</h4>
  
                          <ul class="list-group mb-0 user-list">
                              <li class="list-group-item">
                                  @if (!auth()->user()->two_factor_secret)
                                        <a href="#" class="user-list-item mb-3">
                                            <div class="user float-start me-3">
                                                <i class="mdi mdi-circle text-danger"></i>
                                            </div>
                                            <div class="user-desc overflow-hidden">
                                                <span class="desc text-muted font-12 text-truncate d-block">You have not enabled 2fa.</span>
                                            </div>
                                        </a>
                                        <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary mt-2">
                                                Enable
                                            </button>
                                    @else
                                        <a href="#" class="user-list-item mb-3">
                                            <div class="user float-start me-3">
                                                <i class="mdi mdi-circle text-success"></i>
                                            </div>
                                            <div class="user-desc overflow-hidden">
                                                <span class="desc text-muted font-12 text-truncate d-block">You have 2fa enabled.</span>
                                            </div>
                                        </a>
                                        <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger mt-2">
                                                Disable
                                            </button>
                                    @endif
                              </li>
                              
                                @if(Session('status') == 'two-factor-authentication-enabled')
                                <div class="mb-4 font-medium text-sm text-green-600">
                                     <p>You have now enabled 2fa, please scan the following QR code into your phones authenticator application</p>
                                     {!! auth()->user()->twoFactorQrCodeSvg(); !!}
                                     <br/>
                                </div>
                                    <p>Please store these recovery code in a secure location.</p>
                                    @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes, true)) as $code )
                                    <li class="list-group-item">{{ trim($code) }}</li>
                                    @endforeach
                                @endif
                            </form>
                          </ul>
                      </div>
                      </div>
                      <div class="card">
                      <div class="card-body">
                          <div class="dropdown float-end">
                              <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="mdi mdi-dots-vertical"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-end">
                                  <!-- item-->
                                  <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                  <!-- item-->
                                  <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                  <!-- item-->
                                  <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                  <!-- item-->
                                  <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                              </div>
                          </div>
  
                          <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-notification-clear-all me-1"></i> Delete Account</h4>
                          <ul class="list-group mb-0 user-list">
                              <li class="list-group-item">
                                  <a href="#" class="user-list-item">
                                      <div class="user float-start me-3">
                                          <i class="mdi mdi-circle text-danger"></i>
                                      </div>
                                      <div class="user-desc overflow-hidden">
                                          <p style="color: #adb5bd!important">If you click delete your account will be deleted from the system and what you have posted will take one to two weeks before they are deleted.</p>
                                      </div>
                                  </a>
                                  <form wire:submit.prevent="Disable">
                                        @csrf
                                        <button type="submit" class="btn btn-danger mt-2">
                                            Delete Account
                                        </button>
                                 </form>
                              </li>
                          </ul>
                          
                      </div>
                      </div>
  
                  </div>
              </div>    
          </div> <!-- container -->
  
      </div> <!-- content -->
  </div>
     