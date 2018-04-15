/*
 * @Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
 * @Project Name: Phlick Project
 * @Professor:    James Gordon
 * @Course:       CST-256
 * @Date:         03/04/18
 */
function ConfirmDelete(message) {
    var x = confirm(message);
    if (x)
        return true;
    else
        return false;
}