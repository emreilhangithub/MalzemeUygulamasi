
<!-- BEGIN PAGE CONTENT-->


<div class="row-fluid">

    <!-- BEGIN FORM-->
    <form action="<?php echo base_url("message/update/$contact->id"); ?>"
       class="form-horizontal" method="post">


       <table border="1">
        <tbody>
                
            <tr>
                <td>Ad = </td><td><?php echo $contact->name; ?></td>
            </tr>
            <tr>
                <td>Tarih = </td><td><?php echo $contact->date; ?></td>
            </tr>
            <tr>
                <td>Telefon = </td><td><?php echo $contact->phone; ?></td>
            </tr>
            <tr>
                <td>Mail = </td><td><?php echo $contact->email; ?></td>
            </tr>
            <tr>
                <td>Kullanıcı Adı = </td><td><?php echo $contact->user; ?></td>
            </tr>
            <tr>
                <td>İp Adresi = </td><td><?php echo $contact->IP; ?></td>
            </tr>
            <tr>
                <td>Mesaj = </td><td><?php echo $contact->message; ?></td>
            </tr>
            <tr>
                <td>Admin Mesaj = </td><td><?php echo $contact->adminmessage; ?></td>
            </tr>
        </tbody>          


       </table>

       <br>

    <div class="control-group">
     <label class="control-label">Statü Seçiniz (*) </label>   
        <select name="status">
            <option value="<?php echo $contact->status; ?>"><?php echo $contact->status; ?></option>
            <option value="yeni">Yeni</option>
            <!-- <option value="okundu">Okundu</option> -->
            <option value="islemde">İşlemde</option>
            <option value="tamamlandi">Tamamlandi</option>
        </select>
    </div>

    <div class="control-group">
         <label class="control-label">Admin Mesajı(*) </label>
    <textarea name="adminmessage">
        <?php echo $contact->adminmessage; ?>       
    </textarea>
    </div>


<div class="form-actions">
    <button type="submit" class="btn btn-success">Kaydet</button>
    <a type="button" class="btn" 
    href="<?php echo base_url("message"); ?>">Vazgeç</a>
</div>
</form>
<!-- END FORM-->



</div>
<!-- END PAGE CONTENT-->
