VERSION 5.00
Begin VB.Form frmDelUser 
   BorderStyle     =   3  'Fixed Dialog
   Caption         =   "Delete User Wizard"
   ClientHeight    =   1920
   ClientLeft      =   45
   ClientTop       =   375
   ClientWidth     =   6165
   LinkTopic       =   "Form1"
   MaxButton       =   0   'False
   MDIChild        =   -1  'True
   MinButton       =   0   'False
   ScaleHeight     =   1920
   ScaleWidth      =   6165
   ShowInTaskbar   =   0   'False
   Begin VB.Frame Frame1 
      BackColor       =   &H00FFFFC0&
      BorderStyle     =   0  'None
      Height          =   5775
      Left            =   0
      TabIndex        =   0
      Top             =   0
      Width           =   6375
      Begin VB.TextBox username 
         BackColor       =   &H00C0FFC0&
         BeginProperty Font 
            Name            =   "Times New Roman"
            Size            =   14.25
            Charset         =   0
            Weight          =   400
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   2520
         TabIndex        =   2
         Top             =   600
         Width           =   3135
      End
      Begin VB.CommandButton delete 
         BackColor       =   &H00C0FFC0&
         Caption         =   "Delete User"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         Height          =   495
         Left            =   1680
         MaskColor       =   &H00000080&
         Style           =   1  'Graphical
         TabIndex        =   1
         Top             =   1200
         Width           =   2295
      End
      Begin VB.Label usernamelabel 
         BackStyle       =   0  'Transparent
         Caption         =   "Username"
         BeginProperty Font 
            Name            =   "Palatino Linotype"
            Size            =   14.25
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         ForeColor       =   &H000000C0&
         Height          =   375
         Left            =   360
         TabIndex        =   3
         Top             =   600
         Width           =   1815
      End
   End
End
Attribute VB_Name = "frmDelUser"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Dim erreply As String

Private Sub delete_Click()
    If username.Text = "" Then
        errreply = MsgBox("Please Enter User's Username", vbCritical + vbOKOnly, "Error")
        username.SetFocus
    Else
        Set rsUser = Nothing
        Set rsUser = New ADODB.Recordset
        errreply = "SELECT * FROM usertable WHERE Username LIKE '" & username.Text & "'"
        rsUser.Open errreply, con, adOpenForwardOnly, adLockOptimistic
        If rsUser.EOF = True Then
            errreply = MsgBox("User Does Not Exist", vbCritical + vbOKOnly, "Error")
            username.SetFocus
        Else
            If rsUser!Usertype = "Root" Then
                errreply = MsgBox("A Root User Cannot be Removed", vbCritical + vbOKOnly, "Error")
                username.SetFocus
            Else
                errreply = MsgBox("Are you sure you want to remove this user ?", vbQuestion + vbYesNo, "Confirm Action")
                ' 6 means Yes in msgbox return value
                If errreply = 6 Then
                    errreply = con.Execute("Delete * FROM usertable WHERE Username LIKE '" & username.Text & "'")
                    errreply = MsgBox("User Successfully Removed", vbInformation + vbOKOnly, "Finished")
                End If
                Unload Me
            End If
        End If
    End If
End Sub

Private Sub username_KeyPress(KeyAscii As Integer)
    If KeyAscii = 13 Then
        delete_Click
    End If
End Sub
