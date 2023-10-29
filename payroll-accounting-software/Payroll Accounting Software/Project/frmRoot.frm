VERSION 5.00
Begin VB.MDIForm frmRoot 
   BackColor       =   &H00000000&
   Caption         =   "Payroll Accounting System"
   ClientHeight    =   4920
   ClientLeft      =   225
   ClientTop       =   855
   ClientWidth     =   8475
   LinkTopic       =   "MDIForm1"
   Picture         =   "frmRoot.frx":0000
   StartUpPosition =   3  'Windows Default
   WindowState     =   2  'Maximized
   Begin VB.Menu mnuEmp 
      Caption         =   "&Employee"
      Begin VB.Menu mnuEmpNew 
         Caption         =   "New"
         Shortcut        =   ^N
      End
      Begin VB.Menu mnuEmpUpdt 
         Caption         =   "Update"
         Shortcut        =   ^U
      End
      Begin VB.Menu mnuEmpDel 
         Caption         =   "Delete"
         Shortcut        =   ^X
      End
   End
   Begin VB.Menu mnuPay 
      Caption         =   "&Payroll"
      Begin VB.Menu mnuPayAlw 
         Caption         =   "Allowances"
         Shortcut        =   ^A
      End
      Begin VB.Menu mnuPayDdct 
         Caption         =   "Deductions"
         Shortcut        =   ^D
      End
   End
   Begin VB.Menu mnuRptPay 
      Caption         =   "Pay Slip &Report"
   End
   Begin VB.Menu mnuUser 
      Caption         =   "&User Management"
      Begin VB.Menu mnuAddUser 
         Caption         =   "Add User"
         Shortcut        =   +{INSERT}
      End
      Begin VB.Menu mnuDelUser 
         Caption         =   "Delete User"
         Shortcut        =   +{DEL}
      End
   End
End
Attribute VB_Name = "frmRoot"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Dim reply, reply_msg As String

Private Sub mnuAddUser_Click()
    If activeUsertype = "Normal" Then
        errreply = MsgBox("This action requires Administrator Privileges", vbCritical + vbOKOnly)
    Else
        frmAddUser.show
    End If
End Sub

Private Sub mnuDelUser_Click()
    If activeUsertype = "Normal" Then
        errreply = MsgBox("This action requires Administrator Privileges", vbCritical + vbOKOnly)
    Else
        frmDelUser.show
    End If
End Sub

Private Sub mnuEmpDel_Click()
    frmDelEmp.show
End Sub

Private Sub mnuEmpNew_Click()
    frmNewEmp.show
End Sub

Private Sub mnuEmpUpdt_Click()
    frmEditEmp.show
End Sub

Private Sub mnuPayAlw_Click()
    frmAlw.show
End Sub

Private Sub mnuPayDdct_Click()
    frmDdc.show
End Sub

Private Sub mnuRptPay_Click()
    frmPaySlip.show
End Sub
