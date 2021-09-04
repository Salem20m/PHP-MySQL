<div id="page-wrapper">
  <div class="row">
      <div class="col-md-4 col-md-offset-4">
          <h1 class="page-header">Create Auto</h1>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
      <div class="col-md-4 col-md-offset-4">
          <div class="panel panel-default">
              <div class="panel-body">
                  <div class="row">
                      <div class="col-lg-12">
                          <form role="form" method="post">
                              <div class="form-group">
                                  <label>Model</label>
                                  <input class="form-control" placeholder="Enter the model" name="model" type="text">
                              </div>
                              <div class="form-group">
                                  <label>Year</label>
                                  <input class="form-control" placeholder="Enter year" name="year" type="number" min="1970" max="2017">
                              </div>                            
                              <div class="form-group">
                                  <label>Manufacturer: </label>
                                  <select class="form-control">
                                      <option>Select manufacturer</option>
                                      <option value="1">Porsche</option>                                                
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label>Features</label>
                                  <div class="checkbox">
                                      <label class="col-md-6">
                                          <input type="checkbox" name="feature" value="1">Bluetooth connectivity
                                      </label>
                                  </div>
                                  <div class="checkbox">
                                      <label class="col-md-6">
                                          <input type="checkbox" name="feature" value="2">DVD player
                                      </label>                                             
                                  </div>

                                  <div class="checkbox">
                                      <label class="col-md-6">
                                          <input type="checkbox" name="feature" value="3">Air Bags
                                      </label>                                            
                                  </div>
                                  <div class="checkbox">
                                      <label class="col-md-6">
                                          <input type="checkbox" name="feature" value="4">ABS
                                      </label>                                              
                                  </div>                                         
                              </div>   
                              <button type="submit" class="btn btn-primary pull-right">Register</button>                                        
                          </form>
                      </div>
                      <!-- /.col-lg-12 (nested) -->
                  </div>
                  <!-- /.row (nested) -->
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
</div>
<!-- /#page-wrapper -->