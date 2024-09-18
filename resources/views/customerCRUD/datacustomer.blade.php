


<style>
.container {
  position: relative;
  text-align: center;
  color: rgb(247, 247, 242);
}



.top-right {
  position: absolute;
  top: 200px;
  right: 80px;
  font-size: 40px;
}
.customer {
  position: absolute;
  top: 250px;
  right: 80px;
  font-size: 30px;
}
.id {
  position: absolute;
  top: 290px;
  right: 80px;
  font-size: 20px;
}
.mobile {
  position: absolute;
  top: 360px;
  right: 80px;
  font-size: 15px;
}
.address {
  position: absolute;
  top: 380px;
  right: 80px;
  font-size: 15px;
}
.email {
  position: absolute;
  top: 400px;
  right: 80px;
  font-size: 15px;
}

</style>




<div class="container">
  <img src="https://i.postimg.cc/kGdr5nBC/kartu.png"></img>
 

  <div class="top-right">{{ $data->nama_customer }}</div>
  <p class="customer" >Customer</p>
  <p class="id" >CUS220201-00{{ $data->id }}</p>
  
   <p class="mobile" >Mobile:{{ $data->no_telp }}</p>
   <p class="address" >Address:{{ $data->alamat_customer }}</p>
   <p class="email" >Email:{{ $data->email }}</p>
 
</div>


