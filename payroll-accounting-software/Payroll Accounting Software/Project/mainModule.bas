Attribute VB_Name = "mainModule"
Public con As New ADODB.Connection
Public rsUser As New ADODB.Recordset
Public rsEmp As New ADODB.Recordset
Public rsPay As New ADODB.Recordset
Public activeUsername As String
Public activePassword As String
Public activeUsertype As String

Sub main()
opendb
frmSplash.show
End Sub

Sub opendb()
    Set con = Nothing
    Set con = New ADODB.Connection
    con.Open "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=C:\Project\maindb.mdb;Persist Security Info=False"
End Sub
