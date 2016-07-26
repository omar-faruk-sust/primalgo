<?php require("header.php"); ?>

    <div class="container">
        <div class="row">
        <div class="col-sm-1">
          </div>
          <div class="col-sm-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Panel title</h3>
                </div>
                <div class="panel-body">
                  <form class="form-horizontal" action="second.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                      <label for="nude_no" class="col-sm-2 control-label">Number of Node</label>
                      <div class="col-sm-10">
                        <input type="number" name="node_no" min="10" class="form-control" id="nude_no" placeholder="Please enter the nude number">
                      </div>
                    </div>
                   <div class="form-group">
                   <div class="col-sm-2 control-label"> </div>
                   <div class="col-sm-10">
                        <div class="input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    Browse&hellip; <input type="file" name="input_file" style="display: none;" multiple>
                                </span>
                            </label>
                            <input type="text" name="input_file_name" class="form-control" readonly>
                        </div>
                        <span class="help-block">
                            Select your input file
                        </span>
                    </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="btn-upload" class="btn btn-primary">Proces</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
            <div class="col-sm-1">
            </div>
        </div>
    </div><!-- /.container -->

<?php require("footer.php"); ?>

   
