@extends('admin.layouts.master')
@section('title')
Settings
@endsection
@section('css')
@endsection

@section('content')
<form action="{{route('admin_settings_update')}}" method="post" enctype="multipart/form-data" autocomplete="off">
    @csrf


    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Site Name (EN)</label>
                <input type="text" name="website_name[en]"
                    value="{{ $setting['website_name'] ? json_decode($setting['website_name'], true)['en'] : '' }}"
                    class="form-control" placeholder="Site Name (EN)" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Site Name (AR)</label>
                <input type="text" name="website_name[ar]"
                    value="{{ $setting['website_name'] ? json_decode($setting['website_name'], true)['ar'] : '' }}"
                    class="form-control" placeholder="Site Name (AR)" />
            </div>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">phone</label>
                <input type="number" name="phone" value="{{ $setting['phone'] ?? '' }}" class="form-control"
                    placeholder="phone" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Whatsapp</label>
                <input type="number" name="Whatsapp" value="{{ $setting['Whatsapp'] ?? '' }}" class="form-control"
                    placeholder="Whatsapp" />
            </div>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Address</label>
                <input type="text" name="address" value="{{ $setting['address'] ?? '' }}" class="form-control"
                    placeholder="address" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">email</label>
                <input type="email" name="email" value="{{ $setting['email'] ?? '' }}" class="form-control"
                    placeholder="email" />
            </div>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">meta title</label>
                <input type="text" name="meta_title" value="{{ $setting['meta_title'] ?? '' }}" class="form-control"
                    placeholder="meta title" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">meta description</label>
                <input type="text" name="description" value="{{ $setting['description'] ?? '' }}" class="form-control"
                    placeholder="meta description" />
            </div>
        </div>
    </div>
    <br>
    <h3 class="card-title mt-20 p-b-10" style="color:#2c5aa5">Social Media :</h3>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">
                    <i class="fa fa-facebook"></i>
                    Facebook
                </label>

                <input type="text" name="facebook" value="{{ $setting['facebook'] ?? '' }}" class="form-control"
                    placeholder="Facebook" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">
                    <i class="fa fa-instagram"></i>
                    Instagram
                </label>

                <input type="text" name="instagram" value="{{ $setting['instagram'] ?? '' }}" class="form-control"
                    placeholder="Instagram" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">
                    <i class="fa fa-twitter"></i>
                    Twitter
                </label>

                <input type="text" name="twitter" value="{{ $setting['twitter'] ?? '' }}" class="form-control"
                    placeholder="Twitter" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">
                    <i class="fa fa-linkedin"></i>
                    linkedin
                </label>

                <input type="text" name="linkedin" value="{{ $setting['linkedin'] ?? '' }}" class="form-control"
                    placeholder="linkedin" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">
                    <i class="fa fa-youtube"></i>
                    Youtube
                </label>

                <input type="text" name="youtube" value="{{ $setting['youtube'] ?? '' }}" class="form-control"
                    placeholder="youtube" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">
                    <i class="fa fa-pinterest"></i>
                    pinterest
                </label>

                <input type="text" name="pinterest" value="{{ $setting['pinterest'] ?? '' }}" class="form-control"
                    placeholder="pinterest" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">
                    <i class="fa fa-behance"></i>
                    Behance
                </label>

                <input type="text" name="behance" value="{{ $setting['behance'] ?? '' }}" class="form-control"
                    placeholder="behance" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">
                    <i class="fa fa-tiktok"></i>
                    Tiktok
                </label>

                <input type="text" name="tiktok" value="{{ $setting['tiktok'] ?? '' }}" class="form-control"
                    placeholder="tiktok" />
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body @error('logo_image') has-danger @enderror">
                    <h4 class="card-title">Logo Image</h4>
                    <img src="{{ isset($setting['logo_image']) ? asset($setting['logo_image']) : '' }}" width="50px"
                        height="50px" alt="">
                    <input type="file" name="images[logo_image]" id="input-file-now-custom-1"
                        data-default-file="{{ isset($setting['logo_image']) ? asset($setting['logo_image']) : '' }}"
                        class="dropify" />

                    @error('logo_image')
                        <small class="form-control-feedback"> {{ $message }} </small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body @error('icon_image') has-danger @enderror">
                    <h4 class="card-title">Footer Logo Image</h4>
                    <img src="{{ isset($setting['icon_image']) ? asset($setting['icon_image']) : '' }}" width="50px"
                        height="50px" alt="">


                    <input type="file" name="images[icon_image]" id="input-file-now-custom-1"
                        data-default-file="{{ isset($setting['icon_image']) ? asset($setting['icon_image']) : '' }}"
                        class="dropify" />

                    @error('icon_image')
                        <small class="form-control-feedback"> {{ $message }} </small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body @error('fav_image') has-danger @enderror">
                    <h4 class="card-title">favicon image</h4>
                    <img src="{{ isset($setting['fav_image']) ? asset($setting['fav_image']) : '' }}" width="50px"
                        height="50px" alt="">

                    <input type="file" name="images[fav_image]" id="input-file-now-custom-1"
                        data-default-file="{{ isset($setting['fav_image']) ? asset($setting['fav_image']) : '' }}"
                        class="dropify" />

                    @error('fav_image')
                        <small class="form-control-feedback"> {{ $message }} </small>
                    @enderror
                </div>
            </div>
        </div>

    </div>
    <br>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body @error('facebook_partner') has-danger @enderror">
                    <h4 class="card-title">facebook partner Image</h4>
                    <img src="{{ isset($setting['facebook_partner']) ? asset($setting['facebook_partner']) : '' }}"
                        width="50px" height="50px" alt="">

                    <input type="file" name="images[facebook_partner]" id="input-file-now-custom-1"
                        data-default-file="{{ isset($setting['facebook_partner']) ? asset($setting['facebook_partner']) : '' }}"
                        class="dropify" />

                    @error('facebook_partner')
                        <small class="form-control-feedback"> {{ $message }} </small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body @error('united_nation') has-danger @enderror">
                    <h4 class="card-title">United Nations Image</h4>
                    <img src="{{ isset($setting['united_nation']) ? asset($setting['united_nation']) : '' }}"
                        width="50px" height="50px" alt="">

                    <input type="file" name="images[united_nation]" id="input-file-now-custom-1"
                        data-default-file="{{ isset($setting['united_nation']) ? asset($setting['united_nation']) : '' }}"
                        class="dropify" />

                    @error('united_nation')
                        <small class="form-control-feedback"> {{ $message }} </small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body @error('google_image') has-danger @enderror">
                    <h4 class="card-title">google Image</h4>
                    <img src="{{ isset($setting['google_image']) ? asset($setting['google_image']) : '' }}" width="50px"
                        height="50px" alt="">

                    <input type="file" name="images[google_image]" id="input-file-now-custom-1"
                        data-default-file="{{ isset($setting['google_image']) ? asset($setting['google_image']) : '' }}"
                        class="dropify" />

                    @error('google_image')
                        <small class="form-control-feedback"> {{ $message }} </small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body @error('women_image') has-danger @enderror">
                    <h4 class="card-title">women Image</h4>
                    <img src="{{ isset($setting['women_image']) ? asset($setting['women_image']) : '' }}" width="50px"
                        height="50px" alt="">

                    <input type="file" name="images[women_image]" id="input-file-now-custom-1"
                        data-default-file="{{ isset($setting['women_image']) ? asset($setting['women_image']) : '' }}"
                        class="dropify" />

                    @error('women_image')
                        <small class="form-control-feedback"> {{ $message }} </small>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col">
            <button class="btn btn-success btn-sm">Updated</button>
        </div>
    </div>


</form>

@endsection

@section('js')
@endsection