@push('ckEditorJs')
    <script src="{{asset('admin-panel/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('admin-panel/jalalidatepicker/persian-date.min.js')}}"></script>
    <script src="{{asset('admin-panel/jalalidatepicker/persian-datepicker.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('summary');
            CKEDITOR.replace('body');
            $("#published_at_view").persianDatepicker({

                format: 'YYYY-MM-DD HH:mm',
                toolbox:{
                    calendarSwitch:{
                        enabled: true
                    }
                },
                timePicker: {
                    enabled: false,
                },
                observer : true,
                altField: '#published_at'

            })
        });
    </script>

@endpush
