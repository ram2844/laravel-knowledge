$file->getClientOriginalName();

//Display File Extension
$file->getClientOriginalExtension();

//Display File Real Path
$file->getRealPath();

//Display File Size
$file->getSize();

//Display File Mime Type
$file->getMimeType();

//Move Uploaded File
$destinationPath = 'uploads';
$file->move($destinationPath,$file->getClientOriginalName());