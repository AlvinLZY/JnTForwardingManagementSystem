@extends('include.Master')
@section('title','Create Order Page')
@section('body')

<div class="card-header">Order Page</div>
  <div class="card-body">
      <form action="{{ url('order') }}" method="POST">
        {!! csrf_field() !!}
        <label>Sender ID</label></br>
        <select name="senderID" id="senderID" class="form-control">
          @foreach($customers as $customer)
              <option value="{{$customer['customerID']}}" class="form-control">{{$customer['firstName']. ' ' .$customer['lastName']}}</option>
          @endforeach
        </select>
        </br>
        <label>Receiver ID</label></br>
        <select name="receiverID" id="receiverID" class="form-control">
          @foreach($customers as $customer)
              <option value="{{$customer['customerID']}}" class="form-control">{{$customer['firstName']. ' ' .$customer['lastName']}}</option>
          @endforeach
        </select>
        </br>
        <label>Total Weight</label></br>
        <input type="text" name="totalWeight" id="totalWeight" class="form-control"></br>
        <label>Parcel Content Category</label></br>
        
        <select id="parcelContentCategory" class="form-control" name="parcelContentCategory" required focus onchange='checkvalue(this.value)'>
          <option value="Food">Food</option>
          <option value="Document">Document</option>
          <option value="Box" >Box</option>
          <option value="Electronic" >Electronic</option>
          <!-- <option>Other...</option> -->
        </select>
        <!-- </br>
        <input type="text" id="other_text" class="form-control" name="other_text" placeholder="Enter your category" style='display:none' />

        <script>
          function checkvalue(val)
          {
              if(val==="Other...")
                document.getElementById('other_text').style.display='block';
              else
                document.getElementById('other_text').style.display='none'; 
          }
        </script>
        </br> -->
        </br>
        <input type="submit" value="Save" class="btn btn-success">
        <a href="{{ url()->previous() }}" class="btn btn-success">Back</a>  
      </br>
    </form>
   
  </div>

@endsection
