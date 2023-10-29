VERSION 5.00
Begin VB.Form frmLogin 
   BorderStyle     =   4  'Fixed ToolWindow
   Caption         =   "Login"
   ClientHeight    =   3045
   ClientLeft      =   45
   ClientTop       =   315
   ClientWidth     =   6315
   ClipControls    =   0   'False
   LinkTopic       =   "Form1"
   MaxButton       =   0   'False
   MinButton       =   0   'False
   ScaleHeight     =   3045
   ScaleWidth      =   6315
   ShowInTaskbar   =   0   'False
   StartUpPosition =   2  'CenterScreen
   Begin VB.CommandButton cmdLogin 
      BackColor       =   &H00C0FFC0&
      Caption         =   "Login"
      BeginProperty Font 
         Name            =   "Copperplate Gothic Bold"
         Size            =   14.25
         Charset         =   0
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   855
      Left            =   1680
      MaskColor       =   &H00000080&
      Picture         =   "frmLogin.frx":0000
      Style           =   1  'Graphical
      TabIndex        =   5
      Top             =   1800
      Width           =   2655
   End
   Begin VB.TextBox txtPassword 
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
      Height          =   495
      IMEMode         =   3  'DISABLE
      Left            =   2400
      PasswordChar    =   "*"
      TabIndex        =   4
      Top             =   1080
      Width           =   3615
   End
   Begin VB.TextBox txtUsername 
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
      Height          =   495
      Left            =   2400
      TabIndex        =   2
      Top             =   360
      Width           =   3615
   End
   Begin VB.Label Label3 
      Alignment       =   2  'Center
      BackStyle       =   0  'Transparent
      Caption         =   "Password"
      BeginProperty Font 
         Name            =   "Copperplate Gothic Bold"
         Size            =   14.25
         Charset         =   0
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      ForeColor       =   &H000000C0&
      Height          =   630
      Left            =   0
      TabIndex        =   3
      Top             =   1080
      Width           =   2295
   End
   Begin VB.Label Label2 
      Alignment       =   2  'Center
      BackStyle       =   0  'Transparent
      Caption         =   "Username"
      BeginProperty Font 
         Name            =   "Copperplate Gothic Bold"
         Size            =   14.25
         Charset         =   0
         Weight          =   400
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      ForeColor       =   &H000000C0&
      Height          =   630
      Left            =   0
      TabIndex        =   1
      Top             =   360
      Width           =   2295
   End
   Begin VB.Label Label1 
      Alignment       =   2  'Center
      BackColor       =   &H00FFFFC0&
      Height          =   3075
      Left            =   0
      TabIndex        =   0
      Top             =   0
      Width           =   6315
   End
End
Attribute VB_Name = "frmLogin"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Private Sub cmdLogin_Click()
    Set rsUser = Nothing
    Set rsUser = New ADODB.Recordset
    strSQL = "SELECT * FROM usertable WHERE Username LIKE '" & txtUsername.Text & "' AND Password LIKE '" & txtPassword.Text & "'"
    rsUser.Open strSQL, con, adOpenForwardOnly, adLockOptimistic
    
    If rsUser.EOF = False Then
        activeUsername = rsUser!username
        activePassword = rsUser!password
        activeUsertype = rsUser!Usertype
        frmRoot.show
        Unload Me
    Else
        MsgBox "Invalid Username or Password.", vbCritical, "Login Failed"
        txtUsername = ""
        txtPassword = ""
        txtUsername.SetFocus
        Set rsUser = Nothing
    End If
End Sub

' Map Enter Key with textboxes and command button

Private Sub txtPassword_KeyPress(KeyAscii As Integer)
    If KeyAscii = 13 Then
        If txtUsername.Text = "" Then
            txtUsername.SetFocus
        Else
            cmdLogin_Click
        End If
    End If
End Sub

Private Sub txtUsername_KeyPress(KeyAscii As Integer)
    If KeyAscii = 13 Then
        If txtPassword.Text = "" Then
            txtPassword.SetFocus
        Else
            cmdLogin_Click
        End If
    End If
End Sub
