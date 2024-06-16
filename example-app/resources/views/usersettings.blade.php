@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <!-- Notification Settings -->
            <div class="card mb-4">
                <div class="card-header">
                    Notification Settings
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="priorityLevel">Priority Levels</label>
                            <select class="form-control" id="priorityLevel">
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Customizable Alerts</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="popupAlerts">
                                <label class="form-check-label" for="popupAlerts">
                                    Popup Alerts
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="soundAlerts">
                                <label class="form-check-label" for="soundAlerts">
                                    Sound Alerts
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="vibrationAlerts">
                                <label class="form-check-label" for="vibrationAlerts">
                                    Vibration Alerts
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Settings</button>
                    </form>
                </div>
            </div>

            <!-- Profile Settings -->
            <div class="card mb-4">
                <div class="card-header">
                    Profile Settings
                </div>
                <div class="card-body">
                    <form>
                        <div class="text-center mb-4">
                            <img src="https://via.placeholder.com/150" alt="Profile Photo" class="img-thumbnail mb-3">
                            <div>
                                <input type="file" class="form-control-file" id="profileImage">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" class="form-control" id="fullName" value="John Doe" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" value="johndoe@example.com" disabled>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" id="phone" value="+1234567890">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Additional Settings -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    Additional Settings
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="theme">Theme</label>
                            <select class="form-control" id="theme">
                                <option value="light">Light</option>
                                <option value="dark">Dark</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="language">Language</label>
                            <select class="form-control" id="language">
                                <option value="en">English</option>
                                <option value="fr">French</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Settings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
