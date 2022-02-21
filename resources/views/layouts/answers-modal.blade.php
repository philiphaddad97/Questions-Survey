<div class="modal" id="answers-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Last check before submit!</h5>
                <div id="reload-btn" style="border-radius: 25px;" onclick="reload()"  class="btn btn-danger">
                    <i class="fas fa-circle-notch"></i>
                    re-do the survey
                </div>
            </div>

            <div class="modal-body">
                <div style="border-bottom: 1px solid #D6D2D2; margin-bottom: 10px;">
                    <h6><strong>Your Answers</strong></h6>
                    <div style="padding: 10px;">
                        <ul id="answers-list">

                        </ul>
                    </div>
                </div>
                <div style="border-bottom: 1px solid #D6D2D2; margin-bottom: 25px;">
                    <h6><strong>Your Answers</strong></h6>
                    <div style="padding: 10px;">
                        <ul id="notes-list">

                        </ul>
                    </div>
                </div>

                <div style="width: 50px !important; height: 35px !important;" onclick="submit(event)" class="contact1-form-btn normal" id="btn-yes">
                <span>
                  Submit
                  <i class="fas fa-save"></i>
                </span>
                </div>
            </div>
        </div>


    </div>
</div>
