@if(session('success'))
    <div style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 15px; border-radius: 4px; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
@endif