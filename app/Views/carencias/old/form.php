<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item item"><a href="<?= base_url('/users'); ?>">Usuários</a></li>
            <li class="breadcrumb-item item active" aria-current="page">Titulo</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <a title="Editar usuário" class="btn btn-success btn-sm float-right" href="/users"><i class="fas fa-arrow-left">&nbsp;Voltar</i></a>
        </div>


        <div class="wrapper">
            <div class="bg-white" id="upper-section">
                <h5>Store Information</h5>
                <div class="row pt-3">
                    <div class="col-sm-6">
                        <div id="dropdown" class="bg-light rounded border">
                            <p>Store Name</p> <select name="storename" id="storename" class="bg-light">
                                <option value="newyork">New York, Fifth Avenue</option>
                                <option value="newyork">Seatle, Roger Lane</option>
                                <option value="newjearsy">New Jearsy, Eighth Avenue</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-sm-0 mt-3">
                        <div id="dropdown" class="bg-light rounded border">
                            <p>Employee</p> <select name="emp" id="emp" class="bg-light">
                                <option value="emp1">Daniel Weasly</option>
                                <option value="emp2">Stephen Roy</option>
                                <option value="emp3">David Smith</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 bg-white" id="middle-section">
                <div class="d-sm-flex flex-sm-row align-items-center">
                    <h5>Income</h5> <a href="#" class="ml-auto">why do we need this?<span class="px-1 fa fa-question-circle"></span></a>
                </div>
                <p class="pt-2 text-muted text-justify"> Enter your income pre-tax. If you get paid other than once in a month, sum up your income to match the monthly value. </p>
                <div class="rounded"> <input type="text" class="form-control bg-light income" placeholder="Monthly Income"> </div>
                <h6 class="pt-4">How often do you get paid?</h6>
                <div class="row pt-1">
                    <div class="col-md-4">
                        <div class="options"> <label class="option">Weekly <input type="radio" name="radio"> <span class="checkmark"></span> </label> </div>
                    </div>
                    <div class="col-md-4 mt-md-0 mt-3">
                        <div class="options"> <label class="option">Every Other Week <input type="radio" name="radio"> <span class="checkmark"></span> </label> </div>
                    </div>
                    <div class="col-md-4 mt-md-0 mt-3">
                        <div class="options"> <label class="option">Twice a Month <input type="radio" name="radio"> <span class="checkmark"></span> </label> </div>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-6">
                        <div class="options"> <label class="option">Day of the Month <input type="radio" name="radio"> <span class="checkmark"></span> </label> </div>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-3">
                        <div class="options"> <label class="option">Weekday of the Month <input type="radio" name="radio"> <span class="checkmark"></span> </label> </div>
                    </div>
                </div>
                <h6 class="pt-4">Which day of the week do you normally get paid?</h6>
                <div class="d-sm-flex justify-content-between align-items-center pt-2">
                    <div class="day"> <label class="option">Sun <input type="radio" name="radio"> <span class="checkmark"></span> </label> </div>
                    <div class="day"> <label class="option">Mon <input type="radio" name="radio"> <span class="checkmark"></span> </label> </div>
                    <div class="day"> <label class="option">Tue <input type="radio" name="radio"> <span class="checkmark"></span> </label> </div>
                    <div class="day"> <label class="option">Wed <input type="radio" name="radio"> <span class="checkmark"></span> </label> </div>
                    <div class="day"> <label class="option">Thu <input type="radio" name="radio"> <span class="checkmark"></span> </label> </div>
                    <div class="day"> <label class="option">Fri <input type="radio" name="radio"> <span class="checkmark"></span> </label> </div>
                    <div class="day"> <label class="option">Sat <input type="radio" name="radio"> <span class="checkmark"></span> </label> </div>
                </div>
            </div>
            <div class="mt-3 bg-white" id="lower-section">
                <div class="d-sm-flex flex-sm-row align-items-center">
                    <h5>Bank Account Information</h5> <a href="#" class="ml-auto">why do we need this?<span class="px-1 fa fa-question-circle"></span></a>
                </div>
                <p class="pt-2 text-muted text-justify"> Fill in your bank account details or connect with bank account. </p>
                <div class="row">
                    <div class="col-md-4">
                        <div id="account" class="bg-light rounded border">
                            <p>Routing Number</p> <input type="text" class="form-control bg-light" placeholder="1208828">
                        </div>
                    </div>
                    <div class="col-md-4 mt-md-0 mt-4">
                        <div id="account" class="bg-light rounded border">
                            <p>Account Number</p> <input type="text" class="form-control bg-light" placeholder="64525398784">
                        </div>
                    </div>
                    <div class="col-md-4"> <label class="pr-2 text-muted" id="or">or</label> <button class="btn">Connect Bank</button> </div>
                </div>
            </div>
        </div>

    </div>

</div>