@extends('front.layouts.master')
@section('title')
contactUs
@endsection

@section('content')
    
<!-- Main Container  -->
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Page</a></li>
        <li><a href="#">Contact us</a></li>			
    </ul>
    
    <div class="row">
        <div id="content" class="col-sm-12">
            <div class="page-title">
                <h2>Contact Us</h2>
            </div>
            
            
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3320.297827914066!2d31.185939175388977!3d30.000423274945838!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145847a4cfa22eb3%3A0x26fc3c08fad1c5c3!2z2LTYsdmD2Kkg2YHYp9ix2YjZgiDYrNix2YjYqCDZhNmE2KrYrNin2LHYqSDYp9mE2KXZhNmD2KrYsdmI2YbZitipINmI2KfZhNio2LHZhdis2KkgRmFyb3VrIEdyb3Vw!5e1!3m2!1sen!2seg!4v1735658377468!5m2!1sen!2seg" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="info-contact clearfix">
                <div class="col-lg-4 col-sm-4 col-xs-12 info-store">
                    <div class="row">
                        <div class="name-store">
                            <h3>Your Store</h3>
                        </div>
                        <address>
                            <div class="address clearfix form-group">
                                <div class="icon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <div class="text">My Company, 42 avenue des Champs Elysées 75000 Paris France</div>
                            </div>
                            <div class="phone form-group">
                                <div class="icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="text">Phone : 0123456789</div>
                            </div>
                            <div class="comment">             
                            Maecenas euismod felis et purus consectetur, quis fermentum velition. Aenean egestas quis turpis vehicula.Maecenas euismod felis et purus consectetur, quis fermentum velition. 
                            Aenean egestas quis turpis vehicula.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. 
                            The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                            </div>
                        </address>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-8 col-xs-12 contact-form">
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <fieldset style="margin-top: 20px;">
                            <legend >Contact Form</legend>
                            <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-name">Your Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="" id="input-name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-email">E-Mail Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" value="" id="input-email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-enquiry">Enquiry</label>
                                <div class="col-sm-10">
                                    <textarea name="enquiry" rows="10" id="input-enquiry" class="form-control"></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <div class="buttons">
                            <div class="pull-right">
                                <button class="btn btn-default buttonGray" type="submit">
                                    <span>Submit</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //Main Container -->
@endsection