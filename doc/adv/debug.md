# 断点调试

[toc]

## XDebug

`PHP >= 8.1 & Swoole >= 5.0.2` 已经完全支持了 XDebug 断点调试，如果你正在使用老版本请升级后使用。

## Yasd

Swoole 开发组成员 @codinghuang 开发了一个新的调试扩展，名为 Yasd ，另一个 Swoole 调试器。

众所周知，xdebug 原生对 Swoole 并不兼容，并且代码难以维护，所以才有了 Yasd！

Yasd 完全兼容 xdebug 协议，你可以在任何支持 xdebug 的 IDE 中以同样的方式使用 Yasd 进行单步调试。

Yasd 地址：<https://github.com/swoole/yasd>
