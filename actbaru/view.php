<div style="border-top: 2px solid green;border-bottom: 2px solid green" id="collapseOne<?php echo $cek['id']; ?>" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample">

    <h4 style="font-family: monospace">Tracking PV - <?php echo $cek['name_act']; ?></h4>

    <div class="information-body">
        <form class="grid" action="" method="POST" enctype="multipart/form-data">
            <div class="uyuy">
                <label style="font-weight:600" class="col-form-label">Number PV</label>
                <input type="text" name="num" class="form-control" placeholder="Number">
                <label style="font-weight:600" class="col-form-label">User</label>
                <input type="text" id="srch" class="form-control" placeholder="User">
                <div class="suggest">

                </div>

                <input type="text" name="id" id="userid" class="form-control" hidden>

                <label style="font-weight:600" class="col-form-label">Status</label>
                <select name="stat" class="form-control" style="line-height: 6px;">
                    <option value="pilih">--Pilih---</option>
                    <option value="invoice">Draft</option>
                    <option value="send">Send Loket</option>
                    <option value="Verifikasi">Verification</option>
                    <option value="posted">Posted</option>
                    <option value="transfer">Transfer</option>
                </select>

            </div>
            <div>
                <label style="font-weight:600" class="col-form-label">Upload Invoice</label>
                <input type="file" name="file" class="form-control" placeholder="Activity">
                <label style="font-weight:600" class="col-form-label">Remarks</label>
                <textarea style="margin: 0px 10px auto;float:right" name="remarks" id="" cols="35" rows="6"></textarea>
            </div>

            <button name="make" type="submit" style="width: 100%;margin-left:138px" class="btn btn-primary">Submit</button>

        </form>

        <!-- grid ke 2 -->
        <div style="padding: 9px 10px">
            <label for="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae, facilis. Tenetur voluptate ut modi nemo laudantium aut sapiente labore porro quam amet possimus rem sint iure, dolorem nostrum. Vel, perspiciatis.</label>

        </div>
    </div>
</div>