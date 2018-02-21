function ConfirmDelete() {
    var x = confirm("Are you sure you want to delete that account?");
    if (x)
        return true;
    else
        return false;
}