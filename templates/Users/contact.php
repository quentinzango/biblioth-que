<div class="bg-holder overlay overlay-freya"> <img class="img-fluid" src="<?= $this->Path->getTemplatePath() ?>assets/img/header_2.jpg" alt="Residential" /> <data-parallax="data-parallax" data-rellax-speed="-3"></div>
<div class="form-area">
  <div class="container">
    <div class="row single-form g-0">
      <div class="col-sm-12 col-lg-6">
        <div class="left">
          <h2><SPAN>Nous Contacter</SPAN></h2>
        </div>
      </div>
      <div class="col-sm-12 col-lg-6">
        <div class="right">
          <i class="fa fa-caret-left"></i>
          <form>
            <form>
              <div class="row mb-3">
                <label for="inputname3" class="col-sm-2 col-form-label">name</label><br/>
                <div class="col-sm-100">
                  <input type="text" class="form-control" placeholder="name" id="inputname3">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label><br/>
                <div class="col-sm-10">
                  <input type="email" class="form-control" placeholder="Email" id="inputEmail3">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label><br/>
                <div class="col-sm-10">
                  <input type="password" class="form-control" placeholder="password" id="inputPassword3">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputtext3" class="col-sm-2 col-form-label">Message</label><br/>
                <div class="col-sm-10">
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Envoyer</button>
              <style>
                form{
                  background: #e8e8e8;
                }
                .formarea{
                 padding: 7%;
                }
                .row.single.form{
                  box-shadow: 0 2px 20px -5px rgba(0,0,0,0.5);
                }
                .left{
                  background: blueviolet;
                  padding: 150px 100px;
                }
                .left h2{
                  font-family: Arial, Helvetica, sans-serif;
                  color: #fff;
                  font-weight: 700;
                  font-size: 50px;
                }
                .left h2 span{
                  font-weight: 100;
                }
                .right botton{
                  border: none;
                  border-radius: 0;
                  background: darkgreen;
                  width: 180px;
                  padding: 15px 0;
                  display: inline-block;
                  color: chartreuse;
                  font-size: 16px;
                  margin-top: 20px;
                }

              </style>
            </form>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
