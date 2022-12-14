<?php
function connect($route) {

    return "
    <div class='connect'>
        <div class='modal'>
            <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>
                            Connexion
                        </h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' id='close' aria-label='Close'><span aria-hidden='true'></span></button>
                    </div>
                    <div class='modal-body'>
                        <form action='$route' method='post'>
                            <div class='form-group'>
                                <label for='exampleInputEmail1' class='form-label mt-4'>Email address</label>
                                <input type='email' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp'placeholder='Enter email' name='email'>
                            </div>
                            <div class='form-group'>
                                <label for='exampleInputPassword1' class='form-label mt-4'>Password</label>
                                <input type='password' class='form-control' id='exampleInputPassword1' placeholder='Password' name='pdw'>
                            </div>
                            <div class='modal-footer'>
                                <button type='submit' class='btn btn-primary' name='connect-btn'>Connexion</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
	    </div>
	</div>";

}