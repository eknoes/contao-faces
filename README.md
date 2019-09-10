# Faces Content Element
We have many pages, where staff should be displayed. To have a similar look, we built the Faces Content Element.
The basic idea is to have a central place, where contact information or pictures can be changed.

This Extension is quite simple: It creates a Database Table `tl_ce_faces` and a Backend View to create, update and delete entries.

Furthermore in its class `FacesElem` it provides a ContentElement for our users, where staff can be displayed.